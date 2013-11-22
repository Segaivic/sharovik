<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Артикул</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена, руб.</th>
                <th>Сумма, руб.</th>
            </tr>
        </thead>
   
        <tbody>
  <?php
      $sum = 0;
      foreach ($model as $m) {?>

          <?php
          if (isset($m->product)) {
              ?>

               <tr>
                   <td><?php echo CHtml::encode($m->product['id']) ?></td>
                   <td>
                       <?php echo CHtml::link($m->product['title'],$m->product['url']); ?>
                       <br />
                       <?php $options = SOptionkits::getOptionsByOptionsKitId($m->optionkit_id); ?>
                       <?php foreach ($options as $option): ?>
                           <span style="display: block">
                        <?php if($option['withprice'] == 0){ ?>
                                   <?php echo $option['group'].': '.$option['title'] ?>
                               <?php } else { ?>
                                   <?php echo $option['group'].': '.$option['title'].' + '.$option['price'].' руб.'; ?>
                               <?php } ?>
                    </span>
                       <?php endforeach; ?>
                   </td>
                   <td><?php echo CHtml::encode($m->quantity);  ?></td>
                   <td><?php echo CHtml::encode($m->price); ?></td>
                   <td><?php echo CHtml::encode($m->sum); ?></td>
                   <?php $sum += $m->sum; ?>
               </tr>
               <?php } ?>
               <? if (!isset($m->product)) { ?>
                    <tr>
                   <td>Товар удалён</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
               <? } ?>
           <?  } ?>
            <tr>
               <td></td>
                <td></td>
				<td></td>
                <td><b>Итого:</b></td>
                <td>
                    <b><? echo CHtml::encode($sum); ?> руб.</b>
                </td>
           </tr>
        </tbody>
    </table>