echo Tecflare Multisite System Testing
sudo apt-get install php5
cd test
echo Testing PHP
php -f  test.php
  if [ $? != 0 ]; then
     echo "...Error";
     exit;
  fi

echo ...Success
cd ../
