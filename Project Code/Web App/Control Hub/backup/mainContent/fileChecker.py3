import RPi.GPIO as GPIO, time, os
from urllib import*

def cls():
    os.system(['clear','cls'][os.name == 'nt'])

wasLedLight= 2
wasHamLight= 2

file = open('lightsStatus.txt','r')
while file!='exit':
    file = open('lightsStatus.txt','r')

    ledLight = file.read(1)
    hamLight = file.read(1)
    file.close()

    cls()
    if ledLight!= wasLedLight:
        if ledLight == '1':
            page = urlopen("http://192.168.1.78/?pin=ON")
        else:
           page = urlopen("http://192.168.1.78/?pin=OFF")


    wasLedLight = ledLight
    wasHamLight = hamLight
    #if hamLight == '1':
       #GPIO.output(GREEN,True)
    #else:
        #GPIO.output(GREEN,False)



    #time.sleep(.2) we dont need this.... we can add it in in the future if need be.




