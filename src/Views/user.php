<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 1; ?>
            <?php foreach ($data as $user): ?>
                <tr>
                    <td>
                        <?php echo $number; ?>
                    </td>
                    <td>
                        <?php echo $user['name']; ?>
                    </td>
                    <td>
                        <?php echo $user['age']; ?>
                    </td>
                </tr>
                <?php $number++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>