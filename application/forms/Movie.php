<?php

class Application_Form_Movie extends Zend_Form
{
    // Метод init() вызовется по умолчанию
    public function init()
    {
        // Задаём имя форме
        $this->setName('movie');

        // Создаём элемент hidden c именем = id
        $id = new Zend_Form_Element_Hidden('id');
        // Указываем, что данные в этом элементе фильтруются как число int
        $id->addFilter('Int');
        
        // Создаём переменную, которая будет хранить сообщение валидации
        $isEmptyMessage = 'Значение является обязательным и не может быть пустым';

        // Создаём элемент формы – text c именем = director        
        $director = new Zend_Form_Element_Text('director');
        
        /*
        * Далее пишем содержание label, который будет отображаться для данного поля,
        * указываем, является элемент обязательным или нет,
        * пишем список фильтров, которые будут применяться к данному элементу,
        * и наконец, указываем валидатор и сообщение об ошибке, которое будет выведено пользователю
        */
        $director->setLabel('Режиссёр')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        
        // Создаём второй текстовой элемент формы и проделываем те же операции
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Название')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        
        // Создаём элемент формы Submit c именем = submit
        $submit = new Zend_Form_Element_Submit('submit');
        // Создаём атрибут id = submitbutton
        $submit->setAttrib('id', 'submitbutton');

        // Добавляем все созданные элементы к форме.
        $this->addElements(array($id, $director, $title, $submit));
    }
}
