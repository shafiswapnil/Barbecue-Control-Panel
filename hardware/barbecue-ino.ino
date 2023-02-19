#include <ESP8266WiFi.h>
#include <ArduinoJson.h>

const char *ssid = "";
const char *password = "";
const char *host = ""; // trion.000webhostapp.com
String url;

void setup()
{
  Serial.begin(115200);
  delay(100);
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Wifi connected");
}

void loop()
{
  Serial.print("Connecting to: ");
  Serial.println(host);

  WiFiClient client;
  if (!client.connect(host, 80))
  {
    Serial.println("CONNECTION FAILED");
    return;
  }

  url = "/inc/read.php?id=1";
  Serial.print("Requesting URL: ");
  Serial.println(url);

  client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Connection close\r\n\r\n");
  delay(1500);
  // wait 1.5 second to make and read request

  String section = "header";

  while (client.available())
  {
    String line = client.readStringUntil('\r');
    if (section == "header")
    {
      if (line == "\n")
      {
        // setting section to json
        section = "json";
      }
    }
    else if (section == "json")
    {
      section = "ignore";
      String process = line.substring(1);

      // Parse JSON
      int size = process.length() + 1;
      char json[size];
      process.toCharArray(json, size);

      StaticJsonBuffer<225> jsonBuffer;
      JsonObject &output = jsonBuffer.parseObject(json);
      if (!output.success())
      {
        Serial.println("JSON parsing failure");
        return;
      }
      // Parse JSON end

      // catching parameters into variable
      String motorL = output["controls"][0]["motorL"];
      String motorR = output["controls"][0]["motorR"];
      String spray1 = output["controls"][0]["spray1"];
      String spray2 = output["controls"][0]["spray2"];
      String spray3 = output["controls"][0]["spray3"];

      // motorL and motorR are string, we need to make it integer
      int LeftMotor = motorL.toInt();
      int RightMotor = motorR.toInt();

      Serial.println("LeftMotor(ms): ");
      Serial.println(LeftMotor);
      Serial.println("RightMotor(ms): ");
      Serial.println(RightMotor);
      Serial.println("Spray1: ");
      Serial.println(spray1);
      Serial.println("Spray2: ");
      Serial.println(spray2);
      Serial.println("Spray3: ");
      Serial.println(spray3);

      /*
        at this stage this ino file will read the parameters (from the website)
        and will Serial.println() those parameters individually
      */
    }
  }

  delay(5000);
  // this delay will be dynamic, not actullay 5000
  // for some variable issue I kept it 5000 (for prototype)
}