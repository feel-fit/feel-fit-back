<p align="center"><img width=12.5% src="/public/media/logo.jpeg"></p>


![PHP](https://img.shields.io/packagist/php-v/laravel/laravel.svg)
[![Build Status](https://travis-ci.org/anfederico/Clairvoyant.svg?branch=master)](https://travis-ci.org/anfederico/Clairvoyant)
[![buddy pipeline](https://app.buddy.works/mauroziux/feel-fit-back/pipelines/pipeline/200958/badge.svg?token=52442a7dce4ffd2747fc753805f6f9761ede5a1d045264dfa7b1fb2740adfedc "buddy pipeline")](https://app.buddy.works/mauroziux/feel-fit-back/pipelines/pipeline/200958)
[![StyleCI](https://github.styleci.io/repos/197462595/shield?branch=develop)](https://github.styleci.io/repos/197462595)
[![Maintainability](https://api.codeclimate.com/v1/badges/6c499259a6586d803ea9/maintainability)](https://codeclimate.com/github/feel-fit/feel-fit-back/maintainability)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Introduction

Using stock historical data, train a supervised learning algorithm with any combination of financial indicators. Rapidly backtest your model for accuracy and simulate investment portfolio performance. 

## Before installation
Antes de la instalacion se requiere crear un base de datos y editar el archivo .env modificanto:
```dotenv
DB_DATABASE=NOMBRE_DE_LA_BASE_DE_DATOS
```
## Installation
```bash
composer install
php artisan key:generate
php artisan migrate
php artisan passport:install
php artisan db:seed
```

## Run Serve
```bash
php artisan serve
```

## Run test
```bash
phpunit
```

## Documentation
```text
git clone https://github.com/anfederico/Clairvoyant
```

## Backtesting Signal Accuracy
During the testing period, the model signals to buy or sell based on its prediction for price
movement the following day. By putting your trading algorithm aside and testing for signal accuracy
alone, you can rapidly build and test more reliable models.


#### Social Sentiment Scores
The examples shown use data derived from a project where we are data mining social media and performing stock sentiment analysis. To get an idea of how we do that, please take a look at:
```text
https://github.com/anfederico/Stocktalk
```


## Contributing
Please take a look at our [contributing](https://github.com/anfederico/Clairvoyant/blob/master/CONTRIBUTING.md) guidelines if you're interested in helping!
#### Pending Features
- Export model
- Support for multiple sklearn SVM models
