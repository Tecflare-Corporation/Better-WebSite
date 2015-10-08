echo Install PHP and Updating...
sudo apt-get -qq update
sudo apt-get -qq install php5
cd test
echo Testing PHP Please Wait
OUTPUT="$(find ../ -iname "*.php" -exec php -l {} \; )";
myfunc() {
    find ../ -iname "*.php" -exec php -l {} \;
   reqsubstr="$1"
    shift
    string="$@"
    if [ -z "${string##*$reqsubstr*}" ] ;then
        echo "Error has been detected. System Halting";
        exit 2;
    fi
    }
    myfunc 'Error' $OUTPUT
    
    echo "Success Command Completed Successfully."
    exit 0;