if (location.hostname == 'localhost') {
    var app_path = location.protocol + '//' + location.hostname + ':' + location.port + '/';
} else {
    var app_path = location.protocol + '//' + location.hostname + '/epergam2/';
}

$(document).ready(function () {
    $('.multiple_autocomplete').select2({
        tags: true,
        tokenSeparators: [';'],
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Check author/author_types exists
            checkAuthorTypesExists(e.params.data, e.target);
        }
    });

    $('.single_autocomplete').select2();

    $('.multi_subject_documents').select2({
        tags: true,
        tokenSeparators: [';'],
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Add new subjects if not exists
            checkSubjectExists(e.params.data, e.target);
        }
    });
});

function checkAuthorTypesExists(data, targetObj)
{
    $.ajax({
        url: app_path + "documents/check-author-types-exists",
        type: 'post',
        data: {
            'data': data
        },
        success: function (result) {
            if (result.status != 'error') {
                var isAuthorFound = true;
                var isAuthorTypeFound = true;
                var isAuthoritiesFound = true;
                var showAuthoritiesMsg = true;
                var authorId = 0;
                var authorityTypeId = 0;

                if ( $.type(result.author["not_exist"]) !== 'undefined' ) {
                    isAuthorFound = false;
                }

                if ( $.type(result.author_type["not_exist"]) !== 'undefined' ) {
                    isAuthorTypeFound = false;
                }

                // Author not found add new author
                if ( !isAuthorFound ) {
                    isAuthoritiesFound = false;
                    showAuthoritiesMsg = false;

                    if (confirm(result.author["name"] + " is not in the list of authors, do you want to add it?") == true) {
                        addNewAuthor(result.author["name"], function (ajaxResp) {
                            if (ajaxResp.status == 'success') {
                                authorId = ajaxResp.data["id"];
                                alert(ajaxResp.message);
                            } else {
                                alert(ajaxResp.message);
                            }
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('option[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    authorId = result.author["id"];
                }

                // Author type not found add new author type
                if ( !isAuthorTypeFound ) {
                    isAuthoritiesFound = false;
                    showAuthoritiesMsg = true;

                    if (confirm(result.author_type["name"] + " is not on the list of author types, do you want to add it?") == true) {
                        addNewAuthorType(result.author_type["name"], function (ajaxResp) {
                            if (ajaxResp.status == 'success') {
                                authorityTypeId = ajaxResp.data["id"];
                                alert(ajaxResp.message);
                            } else {
                                alert(ajaxResp.message);
                            }
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('option[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    authorityTypeId = result.author_type["id"];
                }

                if (isAuthorFound && isAuthorTypeFound) {
                    isAuthoritiesFound = result.authorities["found"];
                    showAuthoritiesMsg = true;
                }

                // Check if author is added obviously add new authorities
                if ( !isAuthoritiesFound ) {
                    var canAddAuthorities = true;

                    if (showAuthoritiesMsg) {
                        canAddAuthorities = confirm(result.author["name"] + " is not in the list as " + result.author_type["name"] + ", do you want to add it?");
                    }

                    if (canAddAuthorities) {
                        addNewAuthorities(authorId, authorityTypeId, function (ajaxResp) {
                            if (ajaxResp.status == 'success') {
                                alert(ajaxResp.message);
                            } else {
                                alert(ajaxResp.message);
                            }
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('option[data-select2-tag="true"]').last().remove();
                    }
                }
            }
        }
    });
}

function addNewAuthor(authorName, callBack)
{
    $.ajax({
        url: app_path + "authors/add",
        type: 'post',
        async: false,
        data: {
            'name': authorName
        }
    }).done(function(result) {
        callBack(result);
    }).fail(function() {
        callBack(result);
    });
}

function addNewAuthorType(authorType, callBack)
{
    $.ajax({
        url: app_path + "author-types/add",
        type: 'post',
        async: false,
        data: {
            'name': authorType
        }
    }).done(function(result) {
        callBack(result);
    }).fail(function() {
        callBack(result);
    });
}

function addNewAuthorities(authorId, authorTypeId, callBack)
{
    $.ajax({
        url: app_path + "authorities/add",
        type: 'post',
        async: false,
        data: {
            'author_id': authorId,
            'author_type_id': authorTypeId
        }
    }).done(function(result) {
        callBack(result);
    }).fail(function() {
        callBack(result);
    });
}

function checkSubjectExists(data, targetObj)
{
    var subjectExists = false;

    if (data.text != '') {
        $.ajax({
            url: app_path + "subjects/alreadyExists",
            type: 'post',
            data: {
                'name': data.text
            },
            success: function (result) {
                if (result) {
                    if (confirm(data.text + " is not on the list of subjects, do you want to add it?") == true) {
                        addSubject(data, targetObj, function (result) {
                            $(targetObj).find('option[data-select2-tag="true"]').last().val(result.data.id);
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('option[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    $(targetObj).find('option[data-select2-tag="true"]').last().remove();
                }
            }
        });
    } else {
        $(targetObj).find('option[data-select2-tag="true"]').last().remove();
    }
}

function addSubject(data, targetObj, callBack)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "subjects/add",
            type: 'post',
            data: {
                'name': data.text
            }
        }).done(function(result) {
            callBack(result);
        }).fail(function() {
            callBack(result);
        });
    }
}
