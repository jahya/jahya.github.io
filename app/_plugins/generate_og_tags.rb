module GenerateOGTags
  class Generator < Jekyll::Generator
    def generate(site)
      generate_og_tags site
    end

    def generate_og_tags(site)
      site.posts.each do |post|
        generate_og_image_tags(post)
        generate_og_description_tags(post)
      end
    end

    def generate_og_image_tags(post)
      first_image_src = get_first_image_src(post.content)

      if is_usable(first_image_src) then
        post.data['image'] = first_image_src
      end
    end

    def generate_og_description_tags(post)
      first_paragraph = get_first_paragraph(post.content)

      if is_usable(first_paragraph) then
        first_paragraph = strip_tags(first_paragraph)
        post.data['description'] = first_paragraph
      end
    end

    def get_first_image_src(content)
      content[/img.*?src="(.*?)"/i, 1]
    end

    def get_first_paragraph(content)
      content[/<p>(.*)<\/p>/i, 1]
    end

    def is_usable(src)
      !src.nil?
    end

    def strip_tags(content)
      content.gsub(/<\/?[^>]*>/, "")
    end
  end
end