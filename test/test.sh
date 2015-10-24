if [ ! -z "$1" ]; then
echo "Automated Selected";
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
    
else 

#!/bin/bash

whiptail --title "Tecflare Multisite" --checklist --separate-output "Choose:" 20 78 15 \
"PHP" "" on \
"APACHE" "" off \
"TEST" "" off 2>results

while read choice
do
	case $choice in
		PHP) sudo apt-get -qq install php5; echo "PHP INSTALLED";
		;;
		APACHE) sudo apt-get -qq install apache2; echo "APACHE INSTALLED";
		;;
		TEST) cd test
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
    myfunc 'Php Error' $OUTPUT
    
    echo "Success Command Completed Successfully."
    exit 0;
    
		;;
		*) exit 1;
		;;
	esac
done < results
fi
