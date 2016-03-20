wifi.setmode(wifi.STATION)
wifi.sta.config(sSSID, sPassword)


-- init mqtt client with keepalive timer 120sec
m = mqtt.Client(sClient, 120, mqttUser, mqttPassword)

-- setup Last Will and Testament (optional)
-- Broker will publish a message with qos = 0, retain = 0, data = "offline"
-- to topic "/lwt" if client doesn't send keepalive packet
m:lwt(lwtTopic, "offline", 0, 0)

m:on("connect", function(con) print("connected") end)
m:on("offline", function(con) print("offiline") end)

-- on publish message receive event
m:on("message", function(conn, topic, data)
  print(topic .. ":")
  if data ~= nil then
    if data == "1" then
        print("Led On")
    else if data == "0" then
        print("Led Off")
    else if data == "config" then
        file.open("config.lua")
        file.write("state = 0")
        file.dofile("config.lua")

    end
  end
end)

-- m:connect(host, port, secure, auto_reconnect, function(client) end)
-- for secure: m:connect("192.168.11.118", 1880, 1, 0)
-- for auto-reconnect: m:connect("192.168.11.118", 1880, 0, 1)
m:connect("192.168.1.98", 1883, 0, 0, function(conn) print("connected") end)

-- subscribe to topic with qos = 0
m:subscribe("/lights/livingRoom/tvLight", 0, function(conn) print("subscribe success") end)
-- or subscribe multiple topics (topic/0, qos = 0; topic/1, qos = 1; topic2, qos = 2)
-- m:subscribe({["topic/0"]=0,["topic/1"]=1,topic2=2}, function(conn) print("subscribe success") end)
-- publish a message with data = hello, QoS = 0, retain = 0