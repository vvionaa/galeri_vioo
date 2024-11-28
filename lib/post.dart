class Post {
  final int id;
  final String title;
  final String content;
  final int categoryId;

  Post({required this.id, required this.title, required this.content, required this.categoryId});

  factory Post.fromJson(Map<String, dynamic> json) {
    return Post(
      id: json['id'],
      title: json['title'] ?? 'No Title',
      content: json['content'] ?? 'No Content',
      categoryId: json['category_id'],
    );
  }
}
