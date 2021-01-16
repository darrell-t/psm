// SMAQ v1.0.2 prototype
// v1.0.1 Added Email and LED alert
// v1.0.2 Added Manage Sensor Threshold

#include "Arduino.h"
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <SoftwareSerial.h>
#include <EMailSender.h>
#include <DHT.h>
#include <DallasTemperature.h>
#include <OneWire.h>

#define ONE_WIRE_BUS 4 
#define DHTPIN 5
#define DHTTYPE DHT22

SoftwareSerial fromUno(D6, D5); // RX, TX
DHT dht(DHTPIN, DHTTYPE);
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);
const char *ssid = "WIFI ID";  //WiFi details
const char *password = "WIFI PW";  //WiFi details
const int ldrPin = A0;
EMailSender emailSend("smaqsystest@gmail.com", "PW"); // Email sender account

struct sensorCondition {
  float readings;
  int ledAlert;
};

long startTime, currentTime; // Timer
int waterTempFlag = 1, airTempFlag = 1, lightIntFlag = 1, airHumFlag = 1, phFlag = 1; // To trigger the send email function
float wTempMax, wTempMin, aTempMax, aTempMin, aHumMax, aHumMin, lightMax, lightMin, phMax, phMin; // Sensor Threshold range
char myData[10] = "";
const byte numChars = 32;
char receivedChars[numChars];
boolean newData = false;

// Function to connect to WiFi
void connectWifi(){
  delay(1000);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //Hides the viewing of ESP as WiFi hotspot
  WiFi.begin(ssid, password);     //Connect to WiFi
  Serial.println("");
  Serial.print("Connecting");
  // Waiting for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  //If connection successful show IP address in serial monitor 
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("ESP8266 IP address: ");
  Serial.println(WiFi.localIP());  //IP address of ESP
}

// Function to get pH from Uno
void recvWithStartEndMarkers() {
  static boolean recvInProgress = false;
  static byte ndx = 0;
  char startMarker = '<';
  char endMarker = '>';
  char rc;
  
  while (fromUno.available() > 0 && newData == false) {
    rc = fromUno.read();
    
    if (recvInProgress == true) {
      if (rc != endMarker) {
        receivedChars[ndx] = rc;
        ndx++;
        if (ndx >= numChars) {
          ndx = numChars - 1;
        }
      }
      else {
        receivedChars[ndx] = '\0'; // terminate the string
        recvInProgress = false;
        ndx = 0;
        newData = true;
      }
    }
    
    else if (rc == startMarker) {
    recvInProgress = true;
    }
  }
}

// Function to get Sensor Threshold from database
String readSensorThreshold(){
  //Serial.println("Whole String:  ");
  HTTPClient http;
  http.begin("URL/getThreshold.php"); 
  int httpCode = http.GET();   //Send request
  String payload = http.getString();
  //Serial.println(payload);
  http.end();
  return payload;
}

// Function to separate String to String array
String getThresholdValue(String payload, char delimiter, int index){
  int found = 0;
  int strIndex[] = {0, -1};
  int maxIndex = payload.length()-1;

  for(int i=0; i<=maxIndex && found<=index; i++){
    if(payload.charAt(i)==delimiter || i==maxIndex){
      found++;
      strIndex[0] = strIndex[1]+1;
      strIndex[1] = (i == maxIndex) ? i+1 : i;
    }
  }
  return found>index ? payload.substring(strIndex[0], strIndex[1]) : "";
}

// Function to read pH Level
struct sensorCondition readphLevel() {
  String temp;
  struct sensorCondition phValue;
    if (newData == true) {
        temp = receivedChars;
        phValue.readings = temp.toFloat();
        if(phValue.readings  < phMin || phValue.readings > phMax){
          startTime = millis(); // Get number of ms passed since running the program
          phValue.ledAlert = 1;
          // Send alert email
          if(phFlag == 1){
            EMailSender::EMailMessage message;
            message.subject = "SMAQ System Alert (pH Level)";
            message.message = "pH Level is at " + String(phValue.readings);
            EMailSender::Response resp = emailSend.send("smaqsystest@gmail.com", message);
            Serial.println("Sending status: ");
            //Serial.println(resp.code);
            //Serial.println(resp.desc);
            Serial.println(resp.status);
            phFlag = 0;
            currentTime = startTime;
          }
          else{
            // Check if interval period has passed before sending another email
            if(startTime - currentTime >= 300000){
              phFlag = 1;
            }
          }
      }
      else{
        phValue.ledAlert = 0;
      }
      newData = false;
      return phValue;
    }
}

// Function to read water temperature
struct sensorCondition readWaterTemp(float wTempMax, float wTempMin){
  struct sensorCondition waterTemp;
  sensors.requestTemperatures();
  waterTemp.readings = sensors.getTempCByIndex(0);
  if(waterTemp.readings  < wTempMin || waterTemp.readings > wTempMax){
    startTime = millis(); // Get number of ms passed since running the program
    waterTemp.ledAlert = 1;
      // Send alert email
      if(waterTempFlag == 1){
        EMailSender::EMailMessage message;
        message.subject = "SMAQ System Alert (Water Temperature)";
        message.message = "Water temperature is at " + String(waterTemp.readings) + "°C";
        EMailSender::Response resp = emailSend.send("smaqsystest@gmail.com", message);
        Serial.println("Sending status: ");
        //Serial.println(resp.code);
        //Serial.println(resp.desc);
        Serial.println(resp.status);
        waterTempFlag = 0;
        currentTime = startTime;
      }
      else{
        // Check if interval period has passed before sending another email
        if(startTime - currentTime >= 300000){
          waterTempFlag = 1;
        }
      }
  }
  else{
    waterTemp.ledAlert = 0;
  }
  return waterTemp;  
}

// Function to read air temperature
struct sensorCondition readAirTemp(float aTempMax, float aTempMin){
  struct sensorCondition airTemp;
  airTemp.readings = dht.readTemperature();
  if(airTemp.readings  < aTempMin || airTemp.readings > aTempMax){
    startTime = millis(); // Get number of ms passed since running the program
    airTemp.ledAlert = 1;
      // Send alert email
      if(airTempFlag == 1){
        EMailSender::EMailMessage message;
        message.subject = "SMAQ System Alert (Air Temperature)";
        message.message = "Air Temperature is at " + String(airTemp.readings) + "°C";
        EMailSender::Response resp = emailSend.send("smaqsystest@gmail.com", message);
        Serial.println("Sending status: ");
        //Serial.println(resp.code);
        //Serial.println(resp.desc);
        Serial.println(resp.status);
        airTempFlag = 0;
        currentTime = startTime;
      }
      else{
        // Check if interval period has passed before sending another email
        if(startTime - currentTime >= 300000){
          airTempFlag = 1;
        }
      }
  }
  else{
    airTemp.ledAlert = 0;
  }
  return airTemp;
}

// Function to read air humidity
struct sensorCondition readAirHum(float aHumMax, float aHumMin){
  struct sensorCondition airHum;
  airHum.readings = dht.readHumidity();
  if(airHum.readings < aHumMin || airHum.readings > aHumMax){
    startTime = millis(); // Get number of ms passed since running the program
    airHum.ledAlert = 1;
      // Send alert email
      if(airHumFlag == 1){
        EMailSender::EMailMessage message;
        message.subject = "SMAQ System Alert (Relative Humidity)";
        message.message = "Relative Humidity is at " + String(airHum.readings) + "%";
        EMailSender::Response resp = emailSend.send("smaqsystest@gmail.com", message);
        Serial.println("Sending status: ");
        //Serial.println(resp.code);
        //Serial.println(resp.desc);
        Serial.println(resp.status);
        airHumFlag = 0;
        currentTime = startTime;
      }
      else{
        // Check if interval period has passed before sending another email
        if(startTime - currentTime >= 300000){
          airHumFlag = 1;
        }
      }
  }
  else{
    airHum.ledAlert = 0;
  }
  return airHum;  
}

// Function to read light intensity
struct sensorCondition readLightInt(float lightMax, float lightMin){
  struct sensorCondition lightInt;
  lightInt.readings = analogRead(ldrPin);
  if(lightInt.readings < lightMin || lightInt.readings > lightMax){
    startTime = millis(); // Get number of ms passed since running the program
    lightInt.ledAlert = 1;
      // Send alert email
      if(lightIntFlag == 1){
        EMailSender::EMailMessage message;
        message.subject = "SMAQ System Alert (Light Intensity)";
        message.message = "Light Intensity is at " + String(lightInt.readings) + "lx";
        EMailSender::Response resp = emailSend.send("smaqsystest@gmail.com", message);
        Serial.println("Sending status: ");
        //Serial.println(resp.code);
        //Serial.println(resp.desc);
        Serial.println(resp.status);
        lightIntFlag = 0;
        currentTime = startTime;
      }
      else{
        // Check if interval period has passed before sending another email
        if(startTime - currentTime >= 300000){
          lightIntFlag = 1;
        }
      }
  }
  else{
    lightInt.ledAlert = 0;
  }
  return lightInt;  
}

// Function to send readings
void sendReadings(struct sensorCondition waterTemp, struct sensorCondition airTemp, struct sensorCondition airHum, struct sensorCondition lightInt, struct sensorCondition phValue){
  HTTPClient http;
  String postData;
  postData = "waterTemp=" + String(waterTemp.readings) + "&airTemp=" + String(airTemp.readings) + "&airHum=" + String(airHum.readings) + "&lightInt=" + String(lightInt.readings) + "&phValue=" + String(phValue.readings);
  http.begin("URL/postReadings.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode = http.POST(postData);
  String payload = http.getString();
  Serial.println(httpCode);
  Serial.println(payload);
  http.end();
}

void setup() {
  Serial.begin(9600);
  fromUno.begin(9600);
  connectWifi();
  sensors.begin();
  dht.begin();
  pinMode(ldrPin, INPUT);
  pinMode(2, OUTPUT);
  digitalWrite(2, LOW);
}

void loop() {
  struct sensorCondition waterTemp, airTemp, lightInt, airHum, phValue;
  String payload;
  recvWithStartEndMarkers();
  payload = readSensorThreshold(); // Assign all sensor threshold values to variable
  wTempMax = getThresholdValue(payload, '\n', 0).toFloat();
  wTempMin = getThresholdValue(payload, '\n', 1).toFloat();
  aTempMax = getThresholdValue(payload, '\n', 2).toFloat();
  aTempMin = getThresholdValue(payload, '\n', 3).toFloat();
  aHumMax = getThresholdValue(payload, '\n', 4).toFloat();
  aHumMin = getThresholdValue(payload, '\n', 5).toFloat();
  lightMax = getThresholdValue(payload, '\n', 6).toFloat();
  lightMin = getThresholdValue(payload, '\n', 7).toFloat();
  phMax = getThresholdValue(payload, '\n', 8).toFloat();
  phMin = getThresholdValue(payload, '\n', 9).toFloat();
  waterTemp = readWaterTemp(wTempMax, wTempMin);
  airTemp = readAirTemp(aTempMax, aTempMin);
  airHum = readAirHum(aHumMax, aHumMin);
  lightInt = readLightInt(lightMax, lightMin);
  phValue = readphLevel();
  if(waterTemp.ledAlert == 1 || airTemp.ledAlert == 1 || lightInt.ledAlert == 1 || airHum.ledAlert == 1 || phValue.ledAlert == 1){
    digitalWrite(2, HIGH);
  }
  else{
    digitalWrite(2, LOW);
  }
  sendReadings(waterTemp, airTemp, airHum, lightInt, phValue);
  delay(5000);
}
