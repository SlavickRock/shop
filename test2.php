<?php
class TwoWayList
{
  protected $stack;


    public function __construct() {

        $this->stack = array();

    }
//Добавляет в конец списка элемент
    public function push($item) {
         array_push($this->stack, $item);

    }
//извлекает последний элемент списка
    public function pop() {

            return array_pop($this->stack);
    }
//возвращает текущий элемент списка
    public function top() {
        return current($this->stack);
    }
//проверяет пустой ли список
    public function isEmpty() {
        if (empty($this->stack)==false){
          echo "Список не пустой";
        }
        else {
          echo "Список пуст";
        }
    }
    //Кол-во Элементов в списке
    public function count(){
      return count($this->stack);
    }
    //добавляет элемент в начало списка
    public function unshift ($item){
    return  array_unshift($this->stack, $item);
       }
//удаление элемента
 public function 	remove($item){
   if (array_search($item,$this->stack)) {
     $this->stack =array_flip($this->stack);
     unset($this->stack[$item]);;
     $this->stack =array_flip($this->stack);
     return $this->stack;
   }
 }
 //Кол-во входа  элемента в список
 public function entrance($item){
   $b =0;
   foreach ($this->stack as  $value) {

     if ($value==$item) {
       $b++;
     }
   }
   return $b;
 }
}

class Lyst extends TwoWayList
{
public function 	remove($item){
  TwoWayList::remove($item);
}
 public function entrance($item){
   TwoWayList::entrance($item);
}
 public function unshift ($item){
   TwoWayList::unshift($item);
 }
 public function isEmpty(){
   TwoWayList::isEmpty();
 }
 public function push($item){
   TwoWayList::push($item);
 }
}

$asd = new Lyst();
$asd ->push(5);
$asd ->push(6);
$asd ->push(5);
$asd ->push(5);
$asd ->push(9);
$asd ->push(78);


 ?>
