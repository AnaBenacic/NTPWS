<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Art Blog</title>
  <style>
    body {
      font-family: 'Helvetica', sans-serif;
      text-align: center;
      padding: 20px;
      background-color: white;
    }
    input {
      padding: 10px;
      font-size: 16px;
      margin-bottom: 20px;
    }
    button {
      padding: 10px 15px;
      font-size: 16px;
      cursor: pointer;
      color: white;
      border: none;
      border-radius: 5px;
    }
    .results {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .result {
      margin: 10px;
      width: 300px;
      text-align: left;
    }
    .result img {
      width: 100%;
      border-radius: 8px;
    }
    .result h3 {
      font-size: 18px;
      color: #333;
    }
    .result p {
      font-size: 14px;
      color: #666;
    }
    .button {
      color: white;
      background-color: #32a1bd;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    .button:hover {
	  background-color: #1f6374;
    }
  </style>
</head>
<body>

<script>
// Function to go back to the index page
function goBackToIndex() {
      window.location.href = 'index.php';  // Redirect to the index page
    }
</script>

  <button class="button" onclick="goBackToIndex()">Go back to the index page</button>

  <h1>NASA Image Search</h1>
  <p>I love space. I love looking at images of space. Now you can too!</p>
  <p>Enter a search term (e.g., "moon", "earth", "space")</p>
  
  <input type="text" id="searchTerm" placeholder="Search for images...">
  <button class="button" onclick="fetchImages()">Search</button>
  
  <div class="results" id="slikaResults"></div>

  <script>
    // Function to fetch NASA images based on the search term
    function fetchImages() {
      const searchTerm = document.getElementById('searchTerm').value.trim();
      if (!searchTerm) {
        alert("Please enter a search term.");
        return;
      }
      
      const apiUrl = `https://images-api.nasa.gov/search?q=${searchTerm}&media_type=image`;

      // Clear the previous search results
      document.getElementById('slikaResults').innerHTML = '';

      fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
          const items = data.collection.items;
          
          if (items.length === 0) {
            document.getElementById('slikaResults').innerHTML = '<p>No results found.</p>';
            return;
          }

          items.forEach(item => {
            const slikaData = item.data[0];
            const slikaId = slikaData.nasa_id;
            const slikaTitle = slikaData.title;
            const slikaDescription = slikaData.description || 'No description available.';
            const slikaUrl = `https://images-assets.nasa.gov/image/${slikaId}/${slikaId}~orig.jpg`;
            const slikaLink = `https://images.nasa.gov/details/${slikaId}`;

            // Create a new element to display the image and details
            const resultDiv = document.createElement('div');
            resultDiv.classList.add('result');

            resultDiv.innerHTML = `
              <a href="${slikaLink}" target="_blank">
                <img src="${slikaUrl}" alt="${slikaTitle}">
              </a>
              <h3>${slikaTitle}</h3>
              <p>${slikaDescription}</p>
            `;

            // Append the result to the image results container
            document.getElementById('slikaResults').appendChild(resultDiv);
          });
        })
        .catch(error => {
          console.error('Error fetching images:', error);
          alert('There was an error fetching the images.');
        });
    }
  </script>
</body>
</html>