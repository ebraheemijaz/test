
<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Rating</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" data-step="1" data-intro="Describe your experience with the service provider">
                        <?= form_open("home/accept"); ?>
                        <h4>Review</h4>

                        <style>
                            div.stars {
                                width: 270px;
                                display: inline-block;
                            }

                            input.star { display: none; }

                            label.star {
                                float: right;
                                padding: 10px;
                                font-size: 36px;
                                color: #444;
                                transition: all .2s;
                            }

                            input.star:checked ~ label.star:before {
                                content: '\f005';
                                color: #FD4;
                                transition: all .25s;
                            }

                            input.star-5:checked ~ label.star:before {
                                color: #FE7;
                                text-shadow: 0 0 20px #952;
                            }

                            input.star-1:checked ~ label.star:before { color: #F62; }

                            label.star:hover { transform: rotate(-15deg) scale(1.3); }

                            label.star:before {
                                content: '\f006';
                                font-family: FontAwesome;
                            }
                        </style>


                        <div class="uk-width-medium-1-2">
                            <span>
                                On a scale of 1 to 5 (i.e. Ok to Excellent performance) how would you rate your experience with this person?
                            </span>
                            <div class="stars">

                                <input class="star star-5" id="star-5" type="radio" name="rating" value="5"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="rating" value="4"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="rating" value="3"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="rating" value="2"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="rating" value="1"/>
                                <label class="star star-1" for="star-1"></label>
                            </div>

                        </div>
                        <div style="margin-top: 15px" class="uk-width-medium-1-1">
                            <label for="">Describe your experience</label>
                            <textarea name="review" id="" cols="30" rows="4" class="md-input"></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?= $this->uri->segment(4) ?>"/>
                        <div style="margin-top: 15px" class="uk-width-medium-1-2">
                            <button type="submit" class="md-btn md-btn-primary">Rate</button>
                        </div>

                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
            <?php require_once('advert_v.php'); ?>
            <div id="vid"></div>
        </div>
    </div>
</div>

