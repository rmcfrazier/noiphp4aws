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
ln -s /opt/noiphp4aws/noiphp4aws.sh /etc/cron.daily/noiphp4aws
ln -s /opt/noiphp4aws/noiphp4aws.sh /etc/init.d/noiphp4aws
update-rc.d noiphp4aws defaults
```


## Fork ##
The noiphp4aws app is forked from [diversen/noiphp](https://github.com/diversen/noiphp).
You can check the former setup and usage at [his website](http://www.os-cms.net/blog/view/21/NO-IP-client-written-in-PHP).
