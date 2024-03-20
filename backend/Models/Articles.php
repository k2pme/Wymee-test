<?php

    class Articles {

        private $titre;
        private $contenu;
        private $date_publication;


        public function __construct($titre, $contenu, $date_publication){

            $this->titre = $titre;
            $this->contenu = $contenu;
            $this->date_publication = $date_publication;
        }

        public function create(){

            try {

                $pdo = self::conn();
                $req = $pdo->prepare("INSERT INTO articles (titre, contenu, date_publication) VALUES (:titre, :contenu, :date_publication)");
                $res = $req->execute(['titre' => $this->titre, 'contenu' => $this->contenu, 'date_publication' => $this->date_publication]);
                if($res){
                    
                    return "L'article a ete cree avec sucees !";
                }

            }catch(PDOException $e){
                echo $e;
            }
            

        }


        public static function readAll(){

            try {

                $pdo = self::conn();
                $req = $pdo->query("SELECT id, titre, date_publication FROM articles");
                $res = $req->fetchAll();
                
                if($res > 0){

                    return ['status' => 1,'data'=> $res];
                }else{

                    return ['status' => 0, 'msg'=>"Il y a pas d'articles à afficher aujourd'hui !"];
                }



            }catch(PDOException $e){
                echo $e;
            }

        }

        public static function findOne($id){
            try {

                $pdo = self::conn();
                $req = $pdo->query("SELECT titre, contenu, date_publication FROM articles WHERE id = $id");
                $row = $req->fetch();
                
                return $row;
                

            }catch(PDOException $e){
                echo $e;
            }
        }

        public static function update($id, $titre, $contenu){

            try{

                $pdo = self::conn();
                $req = $pdo->prepare("UPDATE articles
                                    SET titre = :titre, contenu = :contenu
                                    WHERE id = :id
                                ");
                $params = [":id"=>$id, ":titre"=> $titre, ":contenu"=>$contenu];
                if($req->execute($params)){
                    echo "ok";
                }



            }catch(PDOException $e){


            }

        }

        public static function delete($id){
            try{

                $pdo = self::conn();
                $req = $pdo->prepare("DELETE FROM articles WHERE id = :id");
                $params = [":id"=>$id];
                if($req->execute($params)){
                    return true;
                }



            }catch(PDOException $e){


            }
        }

        private static function conn(){

            try{

                $pdo = new PDO("mysql:host=localhost;dbname=wyMeeTest", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $pdo;

            }catch(PDOException $e){
                echo "". $e->getMessage();
            }

        }
    }