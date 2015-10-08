echo Tecflare Multisite System Testing
sudo apt-get update
sudo apt-get install php5
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
    
    echo "System Passed"
    exit 0;