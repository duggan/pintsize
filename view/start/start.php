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
                        </p>
                    </div>
                    <div class="row">
                        <p>
                            <label for="custom">Custom</label>
                            <input type="text" class="medium" id="custom" name="custom" />
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
