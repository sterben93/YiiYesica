<?php
    namespace backend\components;
    use Yii;
    use yii\base\Component;

    class MyComponent extends Component{
        public function hello($value='')
        {
            echo 'welcome to the Yii';
        }
    }
?>