#!/bin/bash

# Get master status
MASTER_STATUS=$(docker exec mysql-master sh -c 'mysql -uroot -prootpassword -e "SHOW MASTER STATUS\G"')
CURRENT_LOG=$(echo "$MASTER_STATUS" | grep 'File:' | awk '{print $2}')
CURRENT_POS=$(echo "$MASTER_STATUS" | grep 'Position:' | awk '{print $2}')

# Configure slave1
docker exec mysql-slave1 sh -c "mysql -uroot -prootpassword -e \"CHANGE MASTER TO MASTER_HOST='mysql-master', MASTER_USER='replication_user', MASTER_PASSWORD='replication_password', MASTER_LOG_FILE='$CURRENT_LOG', MASTER_LOG_POS=$CURRENT_POS; START SLAVE;\""

# Configure slave2
docker exec mysql-slave2 sh -c "mysql -uroot -prootpassword -e \"CHANGE MASTER TO MASTER_HOST='mysql-master', MASTER_USER='replication_user', MASTER_PASSWORD='replication_password', MASTER_LOG_FILE='$CURRENT_LOG', MASTER_LOG_POS=$CURRENT_POS; START SLAVE;\""

# Verify slave1 status
docker exec mysql-slave1 sh -c "mysql -uroot -prootpassword -e 'SHOW SLAVE STATUS\G'"

# Verify slave2 status
docker exec mysql-slave2 sh -c "mysql -uroot -prootpassword -e 'SHOW SLAVE STATUS\G'"
