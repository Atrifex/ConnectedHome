state = 0
sSSID = ""
sPassword = ""
sClient = ""
mqttUser = ""
mqttPassword = ""
sTopic = ""
lwtTopic = ""

if state == 0 then
    -- server to initialize all the settings
    wifi.setmode(wifi.SOFTAP)



else if state == 1 then
    -- connect to mqtt broker and be ready for listening to file
else if state == 2 then
    -- get updates from the central repository
end