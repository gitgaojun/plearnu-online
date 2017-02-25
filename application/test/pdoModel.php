sudo nginx
sudo service php-fpm restart
cd /usr/local/mongodb
sudo ./bin/mongod --dbpath /data/mongo/m17  --logpath /data/mongo/mlog/m17.log --fork  --port 27017 --auth
cd /usr/local/elasticsearch-2.3.4
./bin/elasticsearch -d
sleep 3
curl -X GET localhost:9200
