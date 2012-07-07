#!/bin/bash

#find real path to file
SOURCE="${BASH_SOURCE[0]}"
DIR="$( dirname "$SOURCE" )"
while [ -h "$SOURCE" ]
do 
  SOURCE="$(readlink "$SOURCE")"
  [[ $SOURCE != /* ]] && SOURCE="$DIR/$SOURCE"
  DIR="$( cd -P "$( dirname "$SOURCE"  )" && pwd )"
done
DIR="$( cd -P "$( dirname "$SOURCE" )" && pwd )"


case "$1" in
  start)
    #update no-ip
    php "$DIR/run.php"
    ;;
  stop)
    #on halt or reboot, set server offline
    php "$DIR/run.php" offline
    ;;
  *)
    #crontab update
    php "$DIR/run.php"
    ;;
esac

exit 0
