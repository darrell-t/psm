#include "DFRobot_PH.h"
#include <EEPROM.h>
#include <SoftwareSerial.h>

#define PH_PIN A4
float voltage, phValue, temperature=25;
DFRobot_PH ph;
SoftwareSerial toEsp(5, 6); //RX, TX

void setup(){
  Serial.begin(9600);
  toEsp.begin(9600);
  ph.begin();
}

void loop()
{
    //static unsigned long timepoint = millis();
    String data;
    //if (millis()-timepoint>1000U){ //time interval: 1s
      //timepoint = millis();
      voltage = analogRead(PH_PIN)/1024.0*5000;  // read the voltage
      //temperature = readTemperature();  // read your temperature sensor to execute temperature compensation
      phValue = ph.readPH(voltage,temperature);  // convert voltage to pH with temperature compensation
      //Serial.print("temperature:");
      //Serial.print(temperature,1);
      //Serial.print("^C  pH:");
      Serial.println(phValue);
    //}
      //ph.calibration(voltage,temperature);  // calibration process by Serail CMD
      data = String('<') + String(phValue) + String('>');
      toEsp.print(data);
      delay(1000);
}
