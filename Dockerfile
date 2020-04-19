#
# 7.2PHP-Apache
#


FROM php:7.2-apache

MAINTAINER Dongasai 1514582970@qq.com

RUN apt-get update;
RUN apt-get install -y git wget zip zlib1g-dev;
# 安装常用扩展,开启伪静态
RUN a2enmod rewrite;docker-php-ext-install pdo pdo_mysql;docker-php-ext-enable pdo pdo_mysql;

# 设置运行目录为public
COPY default.conf /etc/apache2/sites-enabled/000-default.conf


RUN docker-php-ext-install bcmath mbstring;

# 安装phalcon 版本
ENV PHALCON_VERSION=3.4.5
RUN curl -sSL -# "https://codeload.github.com/phalcon/cphalcon/tar.gz/v${PHALCON_VERSION}" | tar -xz \
    && cd cphalcon-${PHALCON_VERSION}/build \
    && ./install \
    && cp ../tests/_ci/phalcon.ini $(php-config --configure-options | grep -o "with-config-file-scan-dir=\([^ ]*\)" | awk -F'=' '{print $2}') \
    && cd ../../ \
    && rm -r cphalcon-${PHALCON_VERSION}
# 安装 composer
RUN wget https://mirrors.aliyun.com/composer/composer.phar \
    && chmod +x composer.phar; mv composer.phar /usr/local/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ \
    && composer global require slince/composer-registry-manager ^2.0 \
    && composer repo:use aliyun

#重置工作目录
WORKDIR /var/www/html
# 预部署
COPY composer.json /var/www/html/
COPY composer.lock /var/www/html/
RUN composer install

# 部署项目
COPY . /var/www/html/
RUN chmod -fR 777 runtime