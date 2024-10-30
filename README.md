# Тестовое задание: Реализовать REST API для Пользователя

## Установка и запуск
> [!NOTE]
> Необходимые компоненты **Composer, PHP, Docker**

1. Установить все необходимые пакеты `composer upgrade`
2. Установить `SESSION_DRIVER=file` в `.env`
3. Запустить докер контейнер`docker-compose up -d`
4. Настроить конфигурационный файл `.env` под БД контейнера (по умолчанию как в контейнере)
   - `DB_CONNECTION=mysql`
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=3307`
   - `DB_DATABASE=test-task`
   - `DB_USERNAME=test`
   - `DB_PASSWORD=test`
5. Запустить миграцию БД `php artisan migrate`
6. Запустить проект `php artisan serve`
