<!DOCTYPE html>
<html>
<head>
    <title>Version Comparison</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        select, button {
            padding: 5px;
            margin-right: 10px;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        pre {
            width: 50%;
            background: #f9f9f9;
            padding: 10px;
            overflow-x: auto;
        }
        .added { background-color: #d4f7d4; }
        .removed { background-color: #ffd6d6; }
    </style>
</head>
<body>

    <h2>Compare File Versions</h2>
    <label>Version 1:</label>
    <select id="version1"></select>

    <label>Version 2:</label>
    <select id="version2"></select>

    <button onclick="compare()">Compare</button>

    <div class="container">
        <pre id="left"></pre>
        <pre id="right"></pre>
    </div>

    <!-- JS Diff library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/diff/5.1.0/diff.min.js"></script>

    <script>
        const fileId = 1; 

        fetch(`/api/files/${fileId}/versions`, {
            headers: {
                'Authorization': 'Bearer YOUR_TOKEN_HERE'
            }
        })
        .then(res => res.json())
        .then(data => {
            data.file.versions.forEach(v => {
                const opt1 = new Option(`v${v.version}`, v.version);
                const opt2 = new Option(`v${v.version}`, v.version);
                version1.appendChild(opt1);
                version2.appendChild(opt2);
            });
        });

        function compare() {
            const v1 = document.getElementById('version1').value;
            const v2 = document.getElementById('version2').value;

            fetch(`/api/files/${fileId}/compare?v1=${v1}&v2=${v2}`, {
                headers: {
                    'Authorization': 'Bearer YOUR_TOKEN_HERE'
                }
            })
            .then(res => res.json())
            .then(data => {
                const diff = Diff.diffLines(data.version1.content, data.version2.content);
                let left = '', right = '';

                diff.forEach(part => {
                    const safeText = part.value.replace(/</g, '&lt;').replace(/>/g, '&gt;');
                    if (part.added) {
                        right += `<div class="added">${safeText}</div>`;
                    } else if (part.removed) {
                        left += `<div class="removed">${safeText}</div>`;
                    } else {
                        left += `<div>${safeText}</div>`;
                        right += `<div>${safeText}</div>`;
                    }
                });

                document.getElementById('left').innerHTML = left;
                document.getElementById('right').innerHTML = right;
            });
        }
    </script>

</body>
</html>
