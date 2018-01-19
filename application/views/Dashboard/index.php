<div class="uk-container">
  <h1>Richard Gamora</h1>
  <a href="#add-recipe" uk-toggle class="uk-button uk-button-primary uk-button-small">Add Recipe</a>
  <a href="#add-category" uk-toggle class="uk-button uk-button-primary uk-button-small">Add Category</a>
  <a class="uk-button uk-button-primary uk-button-small">Logout</a>
  <div class="uk-flex uk-margin">
    <div style="width: 30%; padding-right: 10px;">
        <?php echo $system_message; ?>
        <div class="uk-card uk-card-default uk-card-small uk-card-body">
            <h3 class="uk-card-title">Categories</h3>
            <ul class="uk-list uk-list-large">
                <?php if ($categories): ?>
                    <?php foreach ($categories as $key => $cat): ?>
                        <li><?php echo $cat['name']; ?>
                            <p><?php echo $cat['description']; ?></p>
                        </li>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if (!$categories): ?>
                    <li>No Categories.</li>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <div style="width: 70%;">
      <div class="uk-card uk-card-default uk-card-small uk-card-body">
        <h3 class="uk-card-title">Recipes</h3>
            <dl class="uk-description-list uk-description-list-divider">
                <?php if ($recipes): ?>
                    <?php foreach ($recipes as $key => $recipe): ?>
                        <dt><strong><?php echo $recipe['recipe']; ?></strong></dt>
                        <dd><?php echo $recipe['category']; ?></dd>
                        <a href="" uk-icon="icon: pencil"></a>
                        <a href="" uk-icon="icon: trash"></a>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if (!$recipes): ?>
                    <dt><strong>No Recipes.</strong></dt>
                <?php endif ?> 
            </dl>
      </div>
    </div>
  </div>
</div>

<!-- Add Category -->
<div id="add-category" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
    <form action="<?=site_url('Dashboard/add_category')?>" method="POST">
      <fieldset class="uk-fieldset">
        <legend class="uk-legend">Add Category</legend>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Name:" name="name">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Description:" name="description"></textarea>
        </div>
      </fieldset>
      <button class="uk-button uk-button-secondary" type="submit">Save Category</button>
    </form>
  </div>
</div>

<!-- Add Recipe -->
<div id="add-recipe" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
    <form action="<?=site_url('Dashboard/add_recipe')?>" method="POST" enctype="multipart/form-data">
      <fieldset class="uk-fieldset">
        <legend class="uk-legend">Add Recipe</legend>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Name:" name="name">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Description:" name="description"></textarea>
        </div>
        <div class="uk-margin" uk-margin>
            <div uk-form-custom="target: true">
                <input type="file" name="img_url">
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Image" disabled>
            </div>
        </div>
        <div class="uk-margin">
            <select class="uk-select" name="category_id" required>
                <option value="">Category</option>
                <?php if ($categories): ?>
                    <?php foreach ($categories as $key => $cat): ?>
                        <option value="<?=$cat['category_id']?>"><?php echo $cat['name']; ?></option>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if (!$categories): ?>
                    <option>No Categories.</option>
                <?php endif ?>
            </select>
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" rows="10" placeholder="Ingredients:" name="ingredients"></textarea>
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" rows="10" placeholder="Instructions:" name="instructions"></textarea>
        </div>
      </fieldset>
      <button class="uk-button uk-button-secondary" type="submit">Save Category</button>
    </form>
  </div>
</div>