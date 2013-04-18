<table>
  <tbody>
    <tr>
      <th>Use id2:</th>
      <td><?php echo $users->getUseId2() ?></td>
    </tr>
    <tr>
      <th>Use:</th>
      <td><?php echo $users->getUseId() ?></td>
    </tr>
    <tr>
      <th>Con:</th>
      <td><?php echo $users->getConId() ?></td>
    </tr>
    <tr>
      <th>Use name:</th>
      <td><?php echo $users->getUseName() ?></td>
    </tr>
    <tr>
      <th>Use first name:</th>
      <td><?php echo $users->getUseFirstName() ?></td>
    </tr>
    <tr>
      <th>Use middle name:</th>
      <td><?php echo $users->getUseMiddleName() ?></td>
    </tr>
    <tr>
      <th>Use last name:</th>
      <td><?php echo $users->getUseLastName() ?></td>
    </tr>
    <tr>
      <th>Use gender:</th>
      <td><?php echo $users->getUseGender() ?></td>
    </tr>
    <tr>
      <th>Use locale:</th>
      <td><?php echo $users->getUseLocale() ?></td>
    </tr>
    <tr>
      <th>Use link:</th>
      <td><?php echo $users->getUseLink() ?></td>
    </tr>
    <tr>
      <th>Use birthday:</th>
      <td><?php echo $users->getUseBirthday() ?></td>
    </tr>
    <tr>
      <th>Use email:</th>
      <td><?php echo $users->getUseEmail() ?></td>
    </tr>
    <tr>
      <th>Use location:</th>
      <td><?php echo $users->getUseLocation() ?></td>
    </tr>
    <tr>
      <th>Use website:</th>
      <td><?php echo $users->getUseWebsite() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $users->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $users->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('users/edit?use_id2='.$users->getUseId2()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('users/index') ?>">List</a>
