function validateForm() {
    // Get form inputs
    const title = document.getElementById('title').value.trim();
    const description = document.getElementById('description').value.trim();
    const jobType = document.getElementById('job-type').value;
    const category = document.getElementById('category').value;
    const qualifications = document.getElementById('qualifications').value.trim();
    const experience = document.getElementById('experience').value.trim();
    const education = document.getElementById('education').value;
    const salary = document.getElementById('salary').value.trim();

    // Perform validation checks
    if (title === '') {
        //stop form from submitting
        alert('Please enter a job title.');
        return false;
    }

    if (description === '') {
        alert('Please enter a job description.');
        return false;
    }

    if (jobType === '') {
        alert('Please select a job type.');
        return false;
    }

    if (category === '') {
        alert('Please select a category.');
        return false;
    }

    if (qualifications === '') {
        alert('Please enter qualifications.');
        return false;
    }

    if (experience === '') {
        alert('Please enter required work experience.');
        return false;
    }

    if (education === '') {
        alert('Please select the required education level.');
        return false;
    }

    if (salary === '') {
        alert('Please enter the salary.');
        return false;
    }

    // All checks passed, submit the form
    return true;
}

function previewJobBanner(event) {
    const fileInput = event.target;
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function () {
        const jobBannerPreview = document.getElementById('job-banner-preview');
        jobBannerPreview.innerHTML = `<img src="${reader.result}" alt="Job Banner Preview" style="max-width: 300px; max-height: 200px;">`;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}

// Attach the event listener to the job-banner input
const jobBannerInput = document.getElementById('job-banner');
jobBannerInput.addEventListener('change', previewJobBanner);