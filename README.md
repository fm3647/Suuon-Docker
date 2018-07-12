# Suuon-Docker

Suuon-Docker는 Docker로 셋팅 한 PHP운영개발 환경입니다.(LNMP)
* Wordpress, Drupal, XE 등 cms를 설치할 수 있습니다.
* php7.2.7, nginx:latest, mariadb:latest

## 준비

Docker for Windows 혹은 Docker for Mac 설치.

## 서비스

* db：mariadb를 사용하여 DB환경
* php：php-fpm사용.
* web：NGINX 웹서버 사용
* console：기본도구
* phpmyadmin：테이타베이스 관리프로그램.

## 구조

* suuon：개발소스목록，database 데이타폴더, www 소스코드폴더
* services： 환경설정목록，예: nginx 설정파일경로 nginx/config/default.conf
* docker-compose-dev.yml：로컬개발환경셋팅.
* docker-compose.yml：비여있음.
* example.env：복사후 .env로 이름을 바꿔줍니다.

## Install

준비：

```
git clone https://github.com/fm3647/suuon-docker.git
cd suuon-docker
cp example.env .env
```

사용:

```
docker-compose up -d
```