#!/bin/bash
# display sys info
######################################333
read status


if [[ $status != "" ]]; then
	echo "error command not found"
	echo "******************************"
elif [[ $status == "time" ]]; then
	echo "issuing... $time"
	time
else
	echo "command not recognized"
fi
