<?php
/*
Binary Search tree
- Insert
- Search
- Delete
- traversals (inorder, preorder, postorder)
*/

class Node {

      public $data;
      public $left;
      public $right;

      function __construct( $key ) {

          $this->data = $key;
          $this->left = NULL;
          $this->right = NULL;
      }
}

function mostlyRightMin($root) {

         if($root->left) {

            $root = $root->left;
         }

         return $root;
}

function delete($root, $key) {

         if($root == NULL) {

            return $root;

         } else if( $root->data > $key ){

             $root->left = delete($root->left, $key);

         } else if( $root->data < $key ) {

             $root->right = delete($root->right, $key);

         } else {

             if($root->left == NULL && $root->right == NULL) {

                $root = NULL;

             } else if($root->left == NULL) {

                $temp = $root->right;

                $root = NULL;

                return $temp;

             } else if($root->right == NULL) {

               $temp = $root->left;

               $root = NULL;

               return $temp;

             } else if($root->left != NULL && $root->right != NULL ) {

               $temp = mostlyRightMin($root->right);

               $root->data = $temp->data;

               $root->right = delete($root->right, $temp->data);
             }

         }

         return $root;
}

function search($root, $key) {

         if($root == NULL) {
           return 0;
         } else if($root->data > $key) {
            return search($root->left, $key);
         } else if($root->data < $key) {
            return search($root->right, $key);
         }
         return 1;
}

function insert($root, $key) {

         if($root == NULL) {

            $root = new Node( $key );

            $root->left = NULL;

            $root->right = NULL;

         } else if($root->data > $key) {

            $root->left = insert($root->left, $key);

         } else if($root->data < $key) {

            $root->right = insert($root->right, $key);
         }

         return $root;
}

function inorder($root) {

    if($root != NULL) {

      inorder($root->left);

      printf("%d ", $root->data);

      inorder($root->right);
    }
}

function preorder($root) {

    if($root != NULL) {

      printf("%d ", $root->data);

      inorder($root->left);

      inorder($root->right);
    }
}

function postorder($root) {

    if($root != NULL) {

      inorder($root->left);

      inorder($root->right);

      printf("%d ", $root->data);
    }
}

$arrayName = array(9,8,7,11,0,5,4,3,2,1,15,-11);

echo"<pre>";

print_r( $arrayName );

echo"</pre>";

$root = new Node(10);

foreach ($arrayName as $key => $value) {

         insert($root, $value);
}

inorder($root);

printf("Search for %d: %d\n",11, search($root, 11));

$key = 10;

printf("Deleted: %d\n",$key);

delete($root, $key);

inorder($root);
?>
