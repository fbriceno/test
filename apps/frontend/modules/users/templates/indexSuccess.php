<h1>Userss List</h1>

<table>
  <thead>
    <tr>
      <th>Use id2</th>
      <th>Use</th>
      <th>Con</th>
      <th>Use name</th>
      <th>Use first name</th>
      <th>Use middle name</th>
      <th>Use last name</th>
      <th>Use gender</th>
      <th>Use locale</th>
      <th>Use link</th>
      <th>Use birthday</th>
      <th>Use email</th>
      <th>Use location</th>
      <th>Use website</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($userss as $users): ?>
    <tr>
      <td><a href="<?php echo url_for('users/show?use_id2='.$users->getUseId2()) ?>"><?php echo $users->getUseId2() ?></a></td>
      <td><?php echo $users->getUseId() ?></td>
      <td><?php echo $users->getConId() ?></td>
      <td><?php echo $users->getUseName() ?></td>
      <td><?php echo $users->getUseFirstName() ?></td>
      <td><?php echo $users->getUseMiddleName() ?></td>
      <td><?php echo $users->getUseLastName() ?></td>
      <td><?php echo $users->getUseGender() ?></td>
      <td><?php echo $users->getUseLocale() ?></td>
      <td><?php echo $users->getUseLink() ?></td>
      <td><?php echo $users->getUseBirthday() ?></td>
      <td><?php echo $users->getUseEmail() ?></td>
      <td><?php echo $users->getUseLocation() ?></td>
      <td><?php echo $users->getUseWebsite() ?></td>
      <td><?php echo $users->getCreatedAt() ?></td>
      <td><?php echo $users->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('users/new') ?>">New</a>
