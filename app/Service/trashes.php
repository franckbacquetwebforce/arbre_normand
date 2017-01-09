<?php
// pour gitignore : app/Service/trashes.php


public function getProductWithImage()
{
  $sql = "SELECT *,(SELECT * FROM img WHERE id_product = products.id) AS array_img
          FROM $this->table
          WHERE i.status_img = 1";
  $query = $this->dbh->prepare($sql);
  $query->execute();
  debug($query->fetchAll());
  return $query->fetchAll();

}


//function du tuto que je remplace par une autre
function modifierQTeArticle($id_product,$qt_product){
   //Si le panier éxiste
   if ($this->creationPanier())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qt_product > 0)
      {
         //Recharche du produit dans le panier
         $positionProduct = array_search($id_product,  $_SESSION['cart']['id_product']);

         if ($positionProduct !== false)
         {
            $_SESSION['cart']['qt_product'][$positionProduct] = $qt_product ;
         }
      }
      else
      supprimerArticle($id_product);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
// ANCIEN LISTPRODUCT
<section class="thumbs container">
  <main class="main-area">
    <div class="centered">
      <section class="cards">
        <?php foreach($products as $product){  ?>
            <article class="card">
              <figure class="thumbnail">
                <img class="img-responsive" src="<?php echo $this->url('default_home').$product['path'].$product['name']; ?>" alt="<?= $product['product_name'] ?>">
              </figure>
              <div class="card-content">
                <h2><?php if(!empty($product['product_name'])) { echo $product['product_name'];} ?></h2>
                <p><h3><?php if(!empty($product['price_ht'])) { echo $product['price_ht'];} ?> €</h3></p>
                <p class="caract">Catégorie : <?php if(!empty($product['category_name'])) { echo $product['category_name'];} ?></p>
                <p class="caract">Poids : <?php if(!empty($product['weight'])) { echo $product['weight'];}  ?> Kg</p>
                <p class="button"><a href="<?php echo $this->url("singleproduct",["id" => $product['id_product']]); ?>" class="btn btn-success" title="More">Details »</a></p>
              </div><!-- .card-content -->
            </article>
        <?php } ?>
      </section><!-- .card -->
    </div><!-- .centered -->
  </main>
</section>



<!-- table commande -->

<table class="layout display responsive-table">
  <thead>
    <tr>
        <th style="width:15%">Ref</th>
        <th colspan="1" style="width:15%">Date commande</th>
        <th>Produits</th>
        <th>Qté</th>
        <th>Prix TTC</th>
        <th colspan="1" style="width:20%">Statut</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($orders as $order){ ?>
    <tr>
      <td><?php echo $order['ref']; ?></td>
      <td><?php echo $order['date_order']; ?></td>
<?php
// foreach ($order['produits'] as $key => $value){
  for ($i = 0; $i <= count($i); $i++) {
  ?>
      <td><?php echo $order['produits']['product_name']; ?></td>
      <td><?php echo $order['produits']['qt_product']; ?></td>
      <td><?php echo $order['produits']['price_product']; ?></td>
<?php } ?>
<?php for ($i = 0; $i <= count($i); $i++) {
?>  <tr>
      <td></td>
      <td></td>
      <td><?php echo $order['produits']['product_name']; ?></td>
      <td><?php echo $order['produits']['qt_product']; ?></td>
      <td><?php echo $order['produits']['price_product']; ?></td>
    </tr>
<?php } ?>
      <td><button type="button" name="button"><?php echo $order['status']; ?></button></td>
    </tr>
    </table>
    <?php } ?>
  </tbody>
</table>
