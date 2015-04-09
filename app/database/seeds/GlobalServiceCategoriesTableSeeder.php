<?php

class GlobalServiceCategoriesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('global_service_categories')->delete();
        
        GlobalServiceCategory::create(array(
                'title' => 'Получение согласований, разрешений, лицензий'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Общие'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Получение дотаций и социальной помощи'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Регистрация актов гражданского состояния'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Приобретение недвижимости, имущества'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Получение сведений, информации'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Получение образования'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Переезд, миграция'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Предпринимательская деятельность'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Получение медицинской помощи'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Получение (замена) документов, удостоверяющих личность'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Достижение пенсионного возраста'
            )
        );
        
        GlobalServiceCategory::create(array(
                'title' => 'Декларирование доходов и уплата налогов'
            )
        );
    }
}