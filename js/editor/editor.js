// $(window).unload(function() {
// 	alert('sdf');
// 	return false;
// 	// if (confirm("Все изменения сохранены? Можно покинуть сраницу?")) {
// 	// 	//
// 	// };
// });

$(window).on('beforeunload', function() {
    return 'Все изменения сохранены? Можно покинуть сраницу?';
});