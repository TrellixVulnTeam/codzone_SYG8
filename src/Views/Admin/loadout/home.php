<?php
/* @var $selects */
$games = $selects['Game'];
$settings = $selects['Settings'];
?>

<div class="table-container has-background-white-ter">
    <iframe id="home-iframe" src="http://localhost:8001" allowfullscreen="" aria-hidden="false"tabindex="0"></iframe>
    <?php if (isset($_SESSION['success-message'])):?>
        <div class="is-block has-text-centered mt-2"><span class="success-color alert is-inline-block has-text-centered"><?=$_SESSION['success-message']?></span></div>
        <?php \CMS\Helpers\Helpers::deleteSession('success-message');?>
    <?php elseif( isset($_SESSION['error-message']) ):?>
        <div class="is-block has-text-centered mt-2"><span class="warning-color alert is-inline-block has-text-centered"><?=$_SESSION['error-message']?></span></div>
        <?php \CMS\Helpers\Helpers::deleteSession('error-message');?>
    <?php endif; ?>
    <div class="is-block p-4">
        <form method="POST" action="/admin/clases/home-settings">
            <input type="hidden" value="<?=$settings['lastHomeLoadouts']['setting_id']?>" name="settingId">
            <div class="columns">
                <div class="field column has-text-centered">
                    <label class="label" for="firstGame">Primer Juego</label>
                    <div class="select">
                        <select name="firstGame">
                            <?php foreach ($games as $game): ?>
                                <?php if( $game['game_id'] === intval($settings['lastHomeLoadouts']['value'][0]) ): ?>
                                    <option value="<?=$game['game_id']?>" selected><?=$game['name']?></option>
                                <?php else: ?>
                                    <option value="<?=$game['game_id']?>"><?=$game['name']?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="field column has-text-centered">
                    <label class="label" for="secondGame">Segundo Juego</label>
                    <div class="select">
                        <select name="secondGame">
                            <?php foreach ($games as $game): ?>
                                <?php if( $game['game_id'] === intval($settings['lastHomeLoadouts']['value'][1]) ): ?>
                                    <option value="<?=$game['game_id']?>" selected><?=$game['name']?></option>
                                <?php else: ?>
                                    <option value="<?=$game['game_id']?>"><?=$game['name']?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="field column has-text-centered">
                    <label class="label" for="thirdGame">Tercer Juego</label>
                    <div class="select">
                        <select name="thirdGame">
                            <?php foreach ($games as $game): ?>
                                <?php if( $game['game_id'] === intval($settings['lastHomeLoadouts']['value'][2]) ): ?>
                                    <option value="<?=$game['game_id']?>" selected><?=$game['name']?></option>
                                <?php else: ?>
                                    <option value="<?=$game['game_id']?>"><?=$game['name']?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <input type="submit" class="button is-dark" value="Actualizar">
                </div>
            </div>
        </form>
    </div>
</div>

