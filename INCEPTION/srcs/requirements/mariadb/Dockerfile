FROM alpine:3.16

ARG DB_NAME \
    DB_USER \
    DB_PASS \
    DB_ROOT

# Install MariaDB & Create a directory for the socket file
RUN apk upgrade && apk add --no-cache mariadb mariadb-client
RUN mkdir /var/run/mysqld; \
    chmod 777 /var/run/mysqld; \
    { echo '[mysqld]'; \
      echo 'skip-host-cache'; \
      echo 'skip-name-resolve'; \
      echo 'bind-address=0.0.0.0'; \
    } | tee  /etc/my.cnf.d/docker.cnf; \
    sed -i "s|skip-networking|skip-networking=0|g" \
      /etc/my.cnf.d/mariadb-server.cnf

#WORKDIR .

# Copy the configuration file
# COPY /home/itaouil/INCEPTION/srcs/requirements/mariadb/conf/docker.cnf etc/my.cnf.d/docker.cnf

# Initialize mariadb when launched for the first time, and creates the system tables
# The path decides where the database will be stored
RUN mysql_install_db --user=mysql --datadir=/var/lib/mysql

# Copy the configuration file
# COPY conf/docker.cnf etc/my.cnf.d/docker.cnf

# MariaDB will listen for connections on port 3306
EXPOSE 3306

# Copy the script that will create the database we want and the user that will be able to access it
# Execute the script, then delete it
COPY ./tools/maria.sh .
RUN sh maria.sh && rm maria.sh

# Launch the script, then actually start the server
USER mysql
CMD ["/usr/bin/mysqld", "--skip-log-error"]
#CMD ["mysqld_safe"]
