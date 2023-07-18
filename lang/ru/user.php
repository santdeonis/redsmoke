<?php

return [
    'label' => [
        'id' => 'ID',
        'name' => 'ФИО',
        'username' => 'Имя пользователя',
        'role' => 'Роль',
        'email' => 'Email',
        'phone' => 'Номер телефона',
        'password' => 'Пароль',
        'password_confirm' => 'Подтвердите пароль',
        'created_at' => 'Дата создания',
        'updated_at' => 'Дата обновления',
        'deleted_at' => 'Дата блокировки',
    ],

    'filter' => [
        'role' => 'Роль',
    ],

    'placeholder' => [
        'name' => 'Введите ФИО',
        'username' => 'Введите имя пользователя',
        'role' => 'Выберите роль',
        'email' => 'Введите email',
        'password' => 'Введите пароль',
        'password_confirm' => 'Подтвердите пароль',
    ],

    'view' => [
        'label' => 'Пользователь',
        'plural_label' => 'Пользователи',
        'plural_model_label' => 'Пользователи',
        'navigation_label' => 'Пользователи',
    ],
];
