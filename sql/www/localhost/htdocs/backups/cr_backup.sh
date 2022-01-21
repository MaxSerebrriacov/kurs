T=$(date +"%m.%d.%H:%M:%S")
pg_dump -U postgres -d videoteka -h 127.0.0.1 -F c -b -v -f "/home/postgres/nfs03/$T.dump"
