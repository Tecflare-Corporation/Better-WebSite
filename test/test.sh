echo Tecflare Multisite System Testing
cd test
echo Testing PHP
php -f  test.php
  if [ $? != 0 ]; then
     echo "...Error";
     exit 2;
  fi

echo ...Success
cd ../
