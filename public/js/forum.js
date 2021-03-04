window.addEventListener("load", function() {
    let tagList = document.getElementsByClassName('nav-link-faded');
    let selectedTag = document.getElementById('tag-id').value;
    for (let item of tagList) {
        if (selectedTag == item.innerText)
            item.classList.add('active');
        else
            item.classList.remove('active');
    }
});

function calculateDayDifference(date1, date2) {
    const ONE_DAY = 1000 * 60 * 60 * 24;
    const differenceMs = Math.abs(date1 - date2);
    return Math.round(differenceMs / ONE_DAY);
}

function searchForum() {
    let searchContent = document.getElementById('search-forum-text').value;
    let tagValue = document.getElementById('tag-id').value;
    let pageNumber = document.getElementById('hidden_page_number').value;
    let forumFilter = document.getElementById('select-filter').value;
    var token = $('meta[name="csrf-token"]').attr('content');
    let forumObject = { search: searchContent, tag: tagValue, filter: forumFilter };
    $.ajax({
        type: 'PATCH',
        url: '/forum/fetch',
        data: {
            _token: token,
            data: forumObject,
            page: pageNumber
        },
        success: function(data) {
            $('#main-contents-forum').html('');
            $('#main-contents-forum').html(data);
            document.documentElement.scrollTop = 0;
            document.getElementById('search-keyword-tag').innerHTML = (searchContent.trim() != "") ? `Search results for <b class="text-primary">${searchContent}</b>` : "";
        },
        error: function(data) {
            console.log(JSON.stringify(data));
        }
    });
}

function resetFilter() {
    document.getElementById('select-filter').value = "title";
}

// Prevent the page from refreshing when paginate
$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    page = $(this).attr('href').split('page=')[1];
    $('#hidden_page_number').val(page);
    $('li').removeClass('active');
    $(this).parent().addClass('active');
    searchForum();
});

function appendAlertDeleteComment(id, tagValue) {
    Swal.fire({
        title: 'Confirmation',
        html: `<p>Are you sure you want to delete this comment?<p><p>Once deleted this comment, the comment is no longer able to be recovered.</p>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed)
            deleteComment(id, tagValue);
    });
}

function appendAlertDeletePost(id, tagValue) {
    Swal.fire({
        title: 'Confirmation',
        html: `<p>Are you sure you want to delete this forum post and all comments?<p><p>Once deleted this post, the comments and posts are no longer able to be recovered.</p>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed)
            deletePost(id, tagValue);
    });
}

function validatePost(forumForm) {
    let forumTitle = document.getElementById('forum-title').value;
    let forumContents = document.getElementById('forum-summernote').value;
    let forumTag = document.getElementById('forum-tag').value;
    let titleError = document.getElementById('error-msg-title');
    let tagError = document.getElementById('error-msg-select');
    let contentsError = document.getElementById('error-msg-contents');
    titleError.innerHTML = (forumTitle == "") ? "*Invalid Forum Title" : "";
    tagError.innerHTML = (forumTag == "default") ? "*Please select a category" : "";
    contentsError.innerHTML = (forumContents == "") ? "*Invalid Forum Contents" : "";

    if (titleError.innerHTML == "" && tagError.innerHTML == "" && contentsError.innerHTML == "")
        document.getElementById(forumForm).submit();
}

function validateComment(commentForm) {
    let commentType = (commentForm == "commentCreateForm") ? "create" : "edit";
    let commentContents = document.getElementById(`comment-${commentType}-summernote`).value;
    let contentsError = document.getElementById(`error-msg-${commentType}-contents`);
    contentsError.innerHTML = (commentContents == "" || commentContents == "<p><br></p>") ? "*Invalid Forum Contents" : "";

    if (contentsError.innerHTML == "")
        document.getElementById(commentForm).submit();
}

function dismissErrorMessage(messageElement) {
    document.getElementById(messageElement).innerHTML = "";
}

function dismissErrorMessageForum() {
    document.getElementById('error-msg-title').innerHTML = "";
    document.getElementById('error-msg-select').innerHTML = "";
    document.getElementById('error-msg-contents').innerHTML = "";
}