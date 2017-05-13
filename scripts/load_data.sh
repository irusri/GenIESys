#!/bin/bash
#load_data.sh
#USAGE: sh load_data.sh [table_name] [filename]
#sh load_data.sh transcript_info_x /tmp/transcript_info.tsv

#Include settings file
. "$(dirname "$0")"/settings.ini

/usr/bin/mysql --host=${HOST} -u ${DB_USER} -p${DB_PASS} --local_infile=1 --database=${DB}<<EOFMYSQL
TRUNCATE TABLE $1;
ALTER TABLE $1 AUTO_INCREMENT = 1;
load data local infile '$2' replace INTO TABLE $1 fields terminated by '\t' LINES TERMINATED BY '\n' ignore 0 lines;
EOFMYSQL
