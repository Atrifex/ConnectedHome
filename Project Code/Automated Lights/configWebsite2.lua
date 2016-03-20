wifi.setmode(wifi.SOFTAP);
wifi.ap.config({ssid="ConnectedHomeConfig",pwd="12345678"});

srv=net.createServer(net.TCP)
srv:listen(80, function(conn)
  conn:on("receive", function(conn,payload)
    print(payload)
    local buf = ""
    buf = buf.."<!DOCTYPE html>\n"
    buf = buf.."<html lang = \"en\">\n"
    buf = buf.."<body>\n"
    buf = buf.."\n"
    buf = buf.."<h1> Hello, NodeMCU.</h1>\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."\n"
    buf = buf.."</body>\n"
    buf = buf.."</html>\n"

    conn:send(buf)
  end)
  conn:on("sent", function(conn) conn:close() end)
end)