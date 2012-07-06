# No-Ip DNS Update Client for AWS EC2 Instances #
As of Ubuntu 12.04 image for AWS there isn't a noip2 deb package. Thats why **noiphp4aws** exists.

## Setup ##
Also at Ubuntu:
```shell
apt-get install -y php5-cli php5-curl
cd /opt
git clone https://github.com/thiagof/noiphp4aws.git
cd /noiphp4aws
chmod 777 logs
cp config/config.php-dist config/config.php
########
#SHOULD manual setup config.php with noip settings
######
#SETUP TRIGGERS
echo "php /opt/noiphp4aws/run.php" > ./noiphp4aws.run && chmod +x ./noiphp4aws.run
ln -s /opt/noiphp4aws/noiphp4aws.run /etc/cron.daily/ && ln -s /opt/noiphp4aws/noiphp4aws.run /etc/init.d/
```


## Fork ##
The noiphp4aws app is forked from [diversen/noiphp](https://github.com/diversen/noiphp).
You can check the former setup and usage at [his website](http://www.os-cms.net/blog/view/21/NO-IP-client-written-in-PHP).
