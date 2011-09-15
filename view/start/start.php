<?php
/**
 * Pintsize
 *
 * View
 * $import is available in this scope
 */

echo <<<HTML
            <p>
                <form id="shortener" method="post" action="?r=create" class="form-stacked">
                
                    <div class="row">
                        <p>
                            <label for="url">Pintsize a URL</label>
                            <textarea class="xxlarge" id="url" name="url"></textarea>
                            <input type="hidden" name="latitude" id="latitude" />
                            <input type="hidden" name="longitude" id="longitude" />
                        </p>
                    </div>
                    <div class="row">
                        <p>
                        <div class="input-prepend">
                            <label for="custom">Customize</label>
                            <span class="add-on">http://pintsize.orchestra.io/?r=go&amp;shortcode=</span>
                            <input type="text" class="medium" id="custom" name="custom" />
                        </div>
                        </p>
                    </div>
                    <div class="row">
                        <p>
                            <input type="submit" value="Pintsize!" class="btn primary" />
                        </p>
                    </div>
                </form>
                <div class="result row"></div>
            </p>

HTML;
?>
