<table id="<?php echo $this->tableID; ?>" class="<?php echo $this->tableClass; ?>">
  <thead>
    <tr>
      <?php foreach($this->headers as $header): ?>
        <th><?php echo $header; ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->rows as $row): ?>
      <tr class="<?php echo $this->rowClass(); ?>">
        <?php foreach($row as $cell): ?>
          <td><?php echo $cell; ?></td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>