<div class="month-selector">
    <a href="" data-change-month>
        <i class="fa fa-chevron-left"></i>
    </a>
    <div class="selected-month">
        Mois Année
    </div>
    <a href="" data-change-month>
        <i class="fa fa-chevron-right"></i>
    </a>
</div>

<div class="calendar">
    <div class="header">
        <?php for($i = 0; $i < 7; $i++): ?>
            <span>
                <?= $i ?>
            </span>
        <?php endfor; ?>
    </div>
    <div class="weeks">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="week">
                <?php for ($j = 0; $j < 8; $j++): ?>
                    <div
                        class="
                            day
                            <?php if ($i+$j%2==0): ?>active<?php endif; ?>
                            <?php if ($i*$j%2==0): ?>not-same-month<?php endif; ?>
                        "
                    >
                        <span>
                            X
                        </span>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>
