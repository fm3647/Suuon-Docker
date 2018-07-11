FROM centos:7.5
MAINTAINER suuon <i@suuon.com>

# 필수도구 설치
RUN yum install wget curl perl gcc pcre-devel zlib-devel make -y

# Work 목록
WORKDIR /usr/local/src

#  openssl 다운로드
RUN curl -L --progress https://www.openssl.org/source/openssl-1.0.2-latest.tar.gz | tar xz
RUN mv openssl*/ openssl/

# Nginx 다운로드
RUN curl -L --progress http://nginx.org/download/nginx-1.11.10.tar.gz | tar xz
RUN mv nginx*/ nginx/

# Nginx 설정
WORKDIR /usr/local/src/nginx
RUN  ./configure --prefix=/etc/nginx --sbin-path=/usr/sbin/nginx --conf-path=/etc/nginx/nginx.conf --error-log-path=/var/log/nginx/error.log  --http-log-path=/var/log/nginx/access.log --pid-path=/var/run/nginx.pid  --lock-path=/var/run/nginx.lock --http-client-body-temp-path=/var/cache/nginx/client_temp  --http-proxy-temp-path=/var/cache/nginx/proxy_temp --http-fastcgi-temp-path=/var/cache/nginx/fastcgi_temp --http-uwsgi-temp-path=/var/cache/nginx/uwsgi_temp --http-scgi-temp-path=/var/cache/nginx/scgi_temp --user=nginx --group=nginx --with-http_ssl_module --with-http_realip_module --with-http_addition_module --with-http_sub_module --with-http_dav_module --with-http_flv_module --with-http_mp4_module --with-http_gunzip_module --with-http_gzip_static_module --with-http_random_index_module --with-http_secure_link_module --with-http_stub_status_module --with-http_auth_request_module --with-threads --with-stream --with-stream_ssl_module --with-http_slice_module --with-mail --with-mail_ssl_module --with-file-aio --with-http_v2_module --with-stream_realip_module --with-openssl=/usr/local/src/openssl \
  && make \
  && make install \
  && useradd nginx \
  && mkdir /etc/nginx/conf.d \
  && mkdir /var/cache/nginx \
  && chown nginx:root /var/cache/nginx \
  && rm -rf /usr/local/src/nginx \
  && rm -rf /usr/local/src/openssl \
  && rm -rf /var/cache/yum

# 설정파일 복사
COPY ./config/nginx.conf /etc/nginx/
COPY ./config/default.conf /etc/nginx/conf.d/

# forward request and error logs to docker log collector
RUN touch /var/log/nginx/access.log \
  && touch /var/log/nginx/error.log \
  && ln -sf /dev/stdout /var/log/nginx/access.log \
  && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 80 443

CMD ["nginx", "-g", "daemon off;"]
