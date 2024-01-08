FROM httpd:2.4-buster

COPY $PWD/httpd.conf /usr/local/apache2/conf/httpd.conf
COPY $PWD/extra/httpd-vhosts.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf

EXPOSE 80
EXPOSE 443
